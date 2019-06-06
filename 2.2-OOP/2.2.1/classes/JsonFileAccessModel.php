<?php
    //include './config/SystemConfig.php';
    class JsonFileAccessModel extends Config {
        protected $fileName;
        protected $file;
        public function __construct($fileName) {
            $this->fileName = parent::DATABASE_PATH . $fileName . '.json';
        }

        private function connect() {
            if (fopen($this->fileName,'r+') == FALSE) {
                echo 'При открытии файла произошла ошибка';
            }else {
                $this->file = fopen($this->fileName,'r');
            }  
        }

        private function disconnect() {
            fclose($this->file);
            // if (fclose($this->file)==FALSE) {
            //     echo 'При закрытии файла произошла ошибка';
            // } else {
            //     fclose($this->file);
            // }
        }

        public function read() {
            $this->connect();
            $text;
            if (fread($this->file,3000) !== FALSE) {
                $text = fread($this->file,3000);
                $this->disconnect();
                return $text;
            }else {
                echo 'Во время чтения файла произошла ошибка';
            }  
            
        }

        public function write($text) {
            if(fopen($this->file,'w+') !== FALSE) fopen($this->file,'w+');
            if(fwrite($this->file,$text)!== FALSE) echo 'Успешено';
            $this->disconnect();
        }

        public function readJson() {
            $this->connect();
            $text;
            return json_encode(self::read());
            // if (fread($this->file,filesize($this->fileName)) !== FALSE) {
            //     $text = fread($this->file,filesize($this->fileName));
            //     $this->disconnect();
            //     return json_encode($text);
            // }else {
            //     echo 'Во время чтения файла произошла ошибка';
            // }  

        }

        public function writeJson($jsonObject){
            if(fopen($this->file,'w+') !== FALSE) fopen($this->file,'w+');
            if(fwrite($this->file,json_decode($jsonObject,JSON_PRETTY_PRINT))!== FALSE) echo 'Успешено';
            $this->disconnect();
        }
    }

    
?>