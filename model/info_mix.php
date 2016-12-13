<?php
class info_mix
{
    public $id,$img,$name,$content,$title,$keyword,$description;
    public function info_mix($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->content=isset($data['content'])?$data['content']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
    $this->description=isset($data['description'])?$data['description']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->img=addslashes($this->img);
            $this->name=addslashes($this->name);
            $this->content=addslashes($this->content);
            $this->title=addslashes($this->title);
            $this->keyword=addslashes($this->keyword);
            $this->description=addslashes($this->description);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->img=stripslashes($this->img);
            $this->name=stripslashes($this->name);
            $this->content=stripslashes($this->content);
            $this->title=stripslashes($this->title);
            $this->keyword=stripslashes($this->keyword);
            $this->description=stripslashes($this->description);
        }
}
