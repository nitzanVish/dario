<?php
//Handel db queries
class UserModel
{
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    // Get users
    public function get()
    {
        try {
            $SQL = "SELECT * FROM users order by usr_id";
            $stmt = $this->connection->prepare($SQL);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return [
                'status'=> 'success',
                'data'=> $res
            ];
        } catch (PDOException $e) {
            return [
                'status'=> 'error',
                'data'=> $e
            ];
        }
    }
}
