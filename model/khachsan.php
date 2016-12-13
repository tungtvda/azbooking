<?php
class khachsan
{
    public $id,$danhmuc_id,$name,$name_url,$start,$room_type,$img,$content,$title,$keyword,$description;
    public function khachsan($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc_id=isset($data['danhmuc_id'])?$data['danhmuc_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->start=isset($data['start'])?$data['start']:'';
    $this->room_type=isset($data['room_type'])?$data['room_type']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->content=isset($data['content'])?$data['content']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
    $this->description=isset($data['description'])?$data['description']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc_id=addslashes($this->danhmuc_id);
            $this->name=addslashes($this->name);
            $this->name_url=addslashes($this->name_url);
            $this->start=addslashes($this->start);
            $this->room_type=addslashes($this->room_type);
            $this->img=addslashes($this->img);
            $this->content=addslashes($this->content);
            $this->title=addslashes($this->title);
            $this->keyword=addslashes($this->keyword);
            $this->description=addslashes($this->description);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc_id=stripslashes($this->danhmuc_id);
            $this->name=stripslashes($this->name);
            $this->name_url=stripslashes($this->name_url);
            $this->start=stripslashes($this->start);
            $this->room_type=stripslashes($this->room_type);
            $this->img=stripslashes($this->img);
            $this->content=stripslashes($this->content);
            $this->title=stripslashes($this->title);
            $this->keyword=stripslashes($this->keyword);
            $this->description=stripslashes($this->description);
        }
}
