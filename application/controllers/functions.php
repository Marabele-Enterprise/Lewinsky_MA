<?php
    $con = mysqli_connect("localhost","root","");		
    $db_selected = mysqli_select_db($con,'medisuit_db');
    
    $pd = "failed";
    
    if($_POST['instruction'] == 'get-table')
    {    
        $query = $_POST['query'];
        get_table($query);
    //            $pd="here";
        
    }
    
    
    
    if($_POST['instruction'] == "insert" || $_POST['instruction'] == "update")
    {
        $query = $_POST['query'];
        
        update($query);
        //$pd = "---";
    }
    
    function update($query)
    {
        global $con;
        global $pd;
        if(!mysqli_query($con,$query))
        {
            //$pd = "lll";
            $pd = mysqli_error($con);
        }
        else
        {
            $pd = "success";
        }
    }
    
    function noError($query)
    {
        global $con;
        global $pd;
        if(!mysqli_query($con,$query))
        {
            $pd = mysqli_error($con);
            return false;
        }
        else
        {
            $pd = "success";
        }
        return true;
    }
    
    function get_table($query)
    {
        global $con;
        global $pd;
        if(!mysqli_query($con,$query))
        {
                $pd = mysqli_error($con);
        }
        else
        {
                $table = mysqli_query($con,$query);
                
                $rows =  mysqli_num_rows($table);
                $list = array();
                //$result = mysqli_fetch_array($table,MYSQLI_BOTH);
                for($row = 0; $row < $rows; $row++)
                {
                    mysqli_data_seek($table, $row);
                    $tmp = mysqli_fetch_row($table);
                    /*for($col = 0; $col < mysqli_num_fields($table); $col++)
                    {
                        $list[$row][$col] = mysqli_result($table,$row,$col);
                    }*/
                    $list[$row] = $tmp;
                    //= mysqli_result($table,$row);
                }
                
/*                    mysqli_data_seek($table, 0);
                    $tmp = mysqli_fetch_row($table);
                    $pd = mysqli_num_fields($tmp);*/
//echo json_encode($list);
                    $pd = $list;
        }
    }
    
    function mysqli_result($res, $row_=0,$col_=0)
    {
            if($row_ >= 0 && mysqli_num_rows($res) > $row_)
            {
                    mysqli_data_seek($res, $row_);
                    $resrow = mysqli_fetch_row($res);
                    if(isset($resrow[$col_]))
                    {
                            return $resrow[$col_];
                    }
            }
            return "empty";
    }
    
    echo json_encode($pd);

?>