<?php
class Subjects_Model {
    public static function load_subjects($maNganh) {
        $query = "Select * from dh_thuyloi.MonHoc whrere MaNganh = :maNganh";

        if ($stmt = DB::$instance->prepare($query)){
            $stmt->bindParam(':MaNganh', $maNganh, PDO::PARAM_STR, 10);

            if ($stmt->execute())
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Subject');
            return false;
        }
    }
}
?>