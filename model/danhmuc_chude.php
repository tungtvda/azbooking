<?php
class danhmuc_chude
{
    public $id,$name,$name_url,$img,$position,$title,$description,$keyword;
    public function danhmuc_chude($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->position=isset($data['position'])?$data['position']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->description=isset($data['description'])?$data['description']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->name_url=addslashes($this->name_url);
            $this->img=addslashes($this->img);
            $this->position=addslashes($this->position);
            $this->title=addslashes($this->title);
            $this->description=addslashes($this->description);
            $this->keyword=addslashes($this->keyword);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->name_url=stripslashes($this->name_url);
            $this->img=stripslashes($this->img);
            $this->position=stripslashes($this->position);
            $this->title=stripslashes($this->title);
            $this->description=stripslashes($this->description);
            $this->keyword=stripslashes($this->keyword);
        }
}
