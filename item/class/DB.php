<?php
    // 数据库的操作类
    class DB{
        //连接到数据库的属性
        public $dblink;
        //构造函数：初始化属性==》连接到数据库的属性
        function __construct($dbconfig){
            //连接到数据库
            $this->dblink = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['passwd'], $dbconfig['database']);
            //设置默认编码
            $this->dblink->query('SET NAMES ' . $dbconfig['charset']);
        }

        //查询数据的方法：单条数据
        /*
            功能：获取一条信息
            $table：String ，表名
            $fields: String， 查询的字段
            $where：String， 判断条件

            返回值：一维数组
         */
        function getOneData($table, $fields = '*', $where = '1=1'){
            $sql    = 'SELECT '.$fields.' FROM '.$table.' WHERE ' . $where . ' LIMIT 1';
            // var_dump($sql);
            // exit;
            $result = $this->dblink->query($sql);
            $row    = $result->fetch_array(MYSQLI_ASSOC);
            return $row;
        }

        //查询数据的方法：多条数据
        /*
            功能：获取多条信息
            $table：String ，表名
            $fields: String， 查询的字段
            $where：String， 判断条件
            返回值：二维数组
        */
        function getDatas($table, $fields = '*', $where='1=1' ){
            $sql    = 'SELECT '.$fields.' FROM '.$table.' WHERE ' . $where; 
            // var_dump($sql);
            // exit; 
            $result = $this->dblink->query($sql);
            $row    = $result->fetch_all(MYSQLI_ASSOC);
            return $row;
        }

        //添加数据
        /*
            $data: 数组，关联数组，键：表的字段名，值：对应的值
            $table:String ，表名
         */
        function addData($table, $data){
            // $data = array(
            //     'catename'=> '"栏目名称"',
            //     'admin_id'=> 6,
            // );
            //把所有的键（也就是字段名）放到一个数组里面
            $fieldA = array();
            foreach ($data as $field => &$value) {
                $fieldA[] = $field;
                //字符串的时候需要加引号
                if(is_string($value)){
                    $value = '"' . addslashes($value) . '"';
                }
            }
            // $fieldA = arrray('catename', 'admin_id');
            //implode(',', array(键名))
            $sql = 'INSERT INTO '.$table.'('.implode(', ', $fieldA).') VALUES('.implode(',', $data).')';
            // echo $sql;
            //INSERT INTO cate(catename, admin_id) VALUES("栏目名称", 6)
            $r = $this->dblink->query($sql);
            return $r;
        }

        //删除数据的方法
        /*
            功能：删除信息
            $table：String ，表名
            $where：String， 判断条件
            返回值：执行结果
        */
        function delData($table, $where = '1=1'){
            $sql = 'DELETE FROM '.$table.' WHERE ' . $where;
            // echo $sql;
            return $this->dblink->query($sql);
        }

        //修改数据
        /*
            $data: 数组，关联数组，键：表的字段名，值：对应的值
            $table:String ，表名
         */
        function updateData($table, $data, $where = '1=1'){
           
            //把所有的键（也就是字段名）和值用=连接起来放到一个数组里面
            $fielddataA = array();
            $i = 0;
            foreach ($data as $field => $value) {
                //字符串的时候需要加引号
                if(is_string($value)){
                    $value = '"' . addslashes($value) . '"';
                }
                $fielddataA[$i++] = $field . ' = ' . $value;
            }
            $sql    = 'UPDATE '.$table.' SET '.implode(', ', $fielddataA).' WHERE ' . $where;
            $r      = $this->dblink->query($sql);
            return $r;
        }

        //析构函数
        function __destruct(){
            $this->dblink->close();
        }


    }