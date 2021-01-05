<?php
class Vote
{
    private $count_1;
    private $count_2;
    function __construct()
    {
        $this->count_1 = 0;
        $this->count_2 = 0;
    }
    public function count_pilihan($voting)
    {
        if ($voting == "pilihan1") {
            $this->count_1++;
        } elseif ($voting == "pilihan2") {
            $this->count_2++;
        }
    }
    public function get_count1()
    {
        return $this->count_1;
    }
    public function get_count2()
    {
        return $this->count_2;
    }
}

$voting = new Vote();
