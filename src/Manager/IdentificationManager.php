<?php

namespace App\Manager;

use PDO;

class IdentificationManager extends AbstractManager
{
    public const TABLE = 'user';

    /**
     * Insert new user in database
     */
    public function insert(array $userData): void
    {
        $userQuery = "INSERT INTO " . self::TABLE . " (user_name, email, password) VALUES (:user_name, :email, :password)";
        $userStatement = $this->pdo->prepare($userQuery);
        $userStatement->bindValue(':user_name', $userData['user_name'], PDO::PARAM_STR);
        $userStatement->bindValue(':email', $userData['email'], PDO::PARAM_STR);
        $userStatement->bindValue(':password', $userData['password'], PDO::PARAM_STR);
        $userStatement->execute();
    }

    /**
     * Get user by email
     */
    public function getUserByEmail(string $userEmail): array | string
    {
        $userQuery = "SELECT * FROM " . self::TABLE . " WHERE email = :email";
        $userStatement = $this->pdo->prepare($userQuery);
        $userStatement->execute(['email' => $userEmail]);

        return $userStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Delete user in database
     */
    public function delete(int $id): void
    {
        $userQuery = "DELETE FROM " . self::TABLE . " WHERE id = $id";

        $userStatement = $this->pdo->query($userQuery);

        $userStatement->execute();
    }

    /**
     * Get user infos
     */
    public function getUserInfos(int $userId): array | string
    {
        $userQuery = "SELECT * FROM  info  WHERE user_id = $userId";

        $userStatement = $this->pdo->prepare($userQuery);

        $userStatement->execute();

        return $userStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertOrUpdateInfos(array $user, int $userId): void
    {
        $existingInfos = $this->getUserInfos($userId);

        if ($existingInfos) {
            $this->updateInfos($user, $userId);
        } else {
            $this->insertInfos($user, $userId);
        }
    }

    public function insertInfos(array $user, int $userId): void
    {
        $userQuery = "INSERT INTO info (user_id, firstname, lastname, siret, address, bank_details) VALUES (:user_id, :firstname, :lastname, :siret, :address, :bank_details)";

        $userStatement = $this->pdo->prepare($userQuery);

        $userStatement->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $userStatement->bindValue(':firstname', $user['firstname'], PDO::PARAM_STR);
        $userStatement->bindValue(':lastname', $user['lastname'], PDO::PARAM_STR);
        $userStatement->bindValue(':siret', $user['siret'], PDO::PARAM_STR);
        $userStatement->bindValue(':address', $user['address'], PDO::PARAM_STR);
        $userStatement->bindValue(':bank_details', $user['bank_details'], PDO::PARAM_STR);

        $userStatement->execute();
    }

    public function updateInfos(array $user, int $userId): void
    {
        $userQuery = "UPDATE info SET firstname = :firstname, lastname = :lastname, siret = :siret, address = :address, bank_details = :bank_details WHERE user_id = :user_id";

        $userStatement = $this->pdo->prepare($userQuery);

        $userStatement->bindValue(':firstname', $user['firstname'], PDO::PARAM_STR);
        $userStatement->bindValue(':lastname', $user['lastname'], PDO::PARAM_STR);
        $userStatement->bindValue(':siret', $user['siret'], PDO::PARAM_STR);
        $userStatement->bindValue(':address', $user['address'], PDO::PARAM_STR);
        $userStatement->bindValue(':bank_details', $user['bank_details'], PDO::PARAM_STR);
        $userStatement->bindValue(':user_id', $userId, PDO::PARAM_INT);

        $userStatement->execute();
    }

    public function getPasswordByUserId(int $userId): string
    {
        $userQuery = "SELECT password FROM " . self::TABLE . " WHERE id = $userId";

        $userStatement = $this->pdo->query($userQuery);

        $userStatement->execute();

        $result = $userStatement->fetch(PDO::FETCH_ASSOC);
        return $result['password'];
    }

    public function updatePassword(string $newPassword, int $userId): void
    {
        $userQuery = "UPDATE " . self::TABLE . " SET password = :password WHERE id = :id";

        $userStatement = $this->pdo->prepare($userQuery);

        $userStatement->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $userStatement->bindParam(':id', $userId, PDO::PARAM_INT);

        $userStatement->execute();
    }
}
