<?php

namespace App\Manager;

use PDO;

class ListManager extends AbstractManager
{
    public const TABLE = 'list';

    /**
     * Insert list in database
     */
    public function insert(array $list, int $userId): int
    {
        $listQuery = "INSERT INTO " . self::TABLE . "
                 (total_amount, status, created_at, due_at, user_siret, user_name, user_address, user_bank_details,
                 client_siret, client_name, client_address, user_id)
                 VALUES
                 (:total_amount, :status, :created_at, :due_at, :user_siret, :user_name, :user_address, :user_bank_details,
                 :client_siret, :client_name, :client_address, $userId)";

        $listStatement = $this->pdo->prepare($listQuery);

        $listStatement->bindValue(':total_amount', $list['total_amount'], PDO::PARAM_STR);
        $listStatement->bindValue(':created_at', $list['created_at'], PDO::PARAM_STR);
        $listStatement->bindValue(':due_at', $list['due_at'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_siret', $list['user_siret'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_name', $list['user_name'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_address', $list['user_address'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_bank_details', $list['user_bank_details'], PDO::PARAM_STR);
        $listStatement->bindValue(':client_siret', $list['client_siret'], PDO::PARAM_STR);
        $listStatement->bindValue(':client_name', $list['client_name'], PDO::PARAM_STR);
        $listStatement->bindValue(':client_address', $list['client_address'], PDO::PARAM_STR);

        $listStatement->execute();

        // Récupérer l'ID de la nouvelle liste
        $list_id = $this->pdo->lastInsertId();

        return $list_id;
    }

    /**
     * Update list
     */
    public function update(array $list, int $id): void
    {
        $listQuery = "UPDATE " . self::TABLE . "
                        SET total_amount = :total_amount,
                            created_at = :created_at,
                            due_at = :due_at,
                            user_siret = :user_siret,
                            user_name = :user_name,
                            user_address = :user_address,
                            user_bank_details = :user_bank_details,
                            client_siret = :client_siret,
                            client_name = :client_name,
                            client_address = :client_address
                        WHERE id = :id";

        $listStatement = $this->pdo->prepare($listQuery);

        $listStatement->bindValue(':total_amount', $list['total_amount'], PDO::PARAM_STR);
        $listStatement->bindValue(':created_at', $list['created_at'], PDO::PARAM_STR);
        $listStatement->bindValue(':due_at', $list['due_at'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_siret', $list['user_siret'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_name', $list['user_name'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_address', $list['user_address'], PDO::PARAM_STR);
        $listStatement->bindValue(':user_bank_details', $list['user_bank_details'], PDO::PARAM_STR);
        $listStatement->bindValue(':client_name', $list['client_name'], PDO::PARAM_STR);
        $listStatement->bindValue(':client_address', $list['client_address'], PDO::PARAM_STR);
        $listStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $listStatement->execute();
    }

    /**
     * Display user lists
     */
    public function getAllLists(int $userId): array
    {
        $listQuery = "SELECT created_at, due_at, client_name, total_amount, status, id
                FROM " . self::TABLE . " WHERE user_id = $userId ORDER BY id DESC";
        $listStatement = $this->pdo->query($listQuery);
        return $listStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Select a list
     */
    public function selectOneById(int $id): array
    {
        $listQuery = "SELECT * FROM " . self::TABLE . " WHERE id = $id";
        $statementSelectInvoiceData = $this->pdo->query($listQuery);
        $invoice['infos'] = $statementSelectInvoiceData->fetch(PDO::FETCH_ASSOC);

        $querySelectProductData = "SELECT * FROM product WHERE invoice_id = $id";
        $statementSelectProductData = $this->pdo->query($querySelectProductData);
        $invoice['products'] = $statementSelectProductData->fetchAll(PDO::FETCH_ASSOC);

        return $invoice;
    }

    /**
     * Delete a list
     */
    public function delete(int $id): void
    {
        $listQuery = "DELETE FROM " . self::TABLE . " WHERE id = $id";
        $listStatement = $this->pdo->query($listQuery);
        $listStatement->execute();
    }
}
