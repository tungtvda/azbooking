<?php
class dieu_khoan
{
    public $id,$name,$content;
    public function dieu_khoan($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->content=isset($data['content'])?$data['content']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->content=addslashes($this->content);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->content=stripslashes($this->content);
        }
}
