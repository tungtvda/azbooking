<?php
class khachsan_room_price
{
    public $id,$danhmuc_id,$name,$description,$price,$amount_people;
    public function khachsan_room_price($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc_id=isset($data['danhmuc_id'])?$data['danhmuc_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->description=isset($data['description'])?$data['description']:'';
    $this->price=isset($data['price'])?$data['price']:'';
    $this->amount_people=isset($data['amount_people'])?$data['amount_people']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc_id=addslashes($this->danhmuc_id);
            $this->name=addslashes($this->name);
            $this->description=addslashes($this->description);
            $this->price=addslashes($this->price);
            $this->amount_people=addslashes($this->amount_people);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc_id=stripslashes($this->danhmuc_id);
            $this->name=stripslashes($this->name);
            $this->description=stripslashes($this->description);
            $this->price=stripslashes($this->price);
            $this->amount_people=stripslashes($this->amount_people);
        }
}
