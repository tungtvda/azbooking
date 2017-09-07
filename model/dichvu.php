<?php
class dichvu
{
    public $id,$name,$img,$icon,$phone,$email,$link,$position;
    public function dichvu($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->icon=isset($data['icon'])?$data['icon']:'';
    $this->phone=isset($data['phone'])?$data['phone']:'';
    $this->email=isset($data['email'])?$data['email']:'';
    $this->link=isset($data['link'])?$data['link']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->img=addslashes($this->img);
            $this->icon=addslashes($this->icon);
            $this->phone=addslashes($this->phone);
            $this->email=addslashes($this->email);
            $this->link=addslashes($this->link);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->img=stripslashes($this->img);
            $this->icon=stripslashes($this->icon);
            $this->phone=stripslashes($this->phone);
            $this->email=stripslashes($this->email);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
