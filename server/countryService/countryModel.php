<?php
// Handel db queries
class CountryModel
{
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    // Get countries
    public function get()
    {
        try {
            $SQL = "SELECT * FROM countries order by cnt_id";
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
