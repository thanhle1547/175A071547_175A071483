<?php
class DB_Param {
    public $parameter;
    public $variable;
    public $data_type;
    public $length;

    public function __construct(
        $parameter,
        &$variable,
        $data_type = PDO::PARAM_STR,
        $length = null)
    {
        $this->parameter = $parameter;
        $this->variable = $variable;
        $this->data_type = $data_type;
        $this->length = $length;
    }
}
?>