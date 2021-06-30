<?php
// Handel db queries
class SendLogModel
{
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    // Get filtered data
    public function get($data)
    {
        try {
            $SQL = " SELECT DATE_FORMAT(log_created, '%Y-%m-%d') AS date, ";
            $SQL .= " COUNT(IF(log_success = 1, log_success, null)) AS log_success_amount, ";
            $SQL .= " COUNT(IF(log_success = 0, log_success, null)) AS log_failed_amount ";
            $SQL .= " FROM send_log";
            $SQL = $data['cnt_id'] ? $SQL . " LEFT JOIN numbers on send_log.num_id = numbers.num_id " : $SQL;
            $SQL .= " WHERE DATE_FORMAT(log_created, '%Y-%m-%d') > DATE_FORMAT(:date_from, '%Y-%m-%d') ";
            $SQL .= " AND DATE_FORMAT(log_created, '%Y-%m-%d') < DATE_FORMAT(:date_to, '%Y-%m-%d')  ";
            $SQL = $data['usr_id'] ? $SQL . " AND usr_id = :usr_id" : $SQL;
            $SQL = $data['cnt_id'] ? $SQL . " AND numbers.cnt_id = :cnt_id" : $SQL;
            $SQL .= " GROUP BY DATE_FORMAT(log_created, '%Y-%m-%d')";

            $stmt = $this->connection->prepare($SQL);

            $filter = [
                'date_from' => $data['date_from'],
                'date_to' => $data['date_to']
            ];
            
            $filter = $data['usr_id'] ? array_merge($filter, ['usr_id' => $data['usr_id']]) : $filter;
            $filter = $data['cnt_id'] ? array_merge($filter, ['cnt_id' => $data['cnt_id']]) : $filter;

            $stmt->execute($filter);
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
