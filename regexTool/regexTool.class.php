<?php

class regexTool(
    private $validate = array(
        'moblie'=>'/^1(3|5|7|8)\d{9}$/',
        'require'=>'/.+/',
        'email'=>'/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
            
    );
    private $returnMatchResult=false;
    private $fixMode=null;
    private $matches=array();
    private $isMatch=false;

    public function __construct($returnMatchResult=false, $fixMode=null){
        $this->returnMatchResult=$returnMatchResult;
        $this->fixMode=$fixMode;
    }

    private function regex($pattern,$subject){
        if (array_key_exists(strtolower($pattern),$this->validate))
        {
            $pattern=$this->validate[$pattern].$this->fixMode;
        }
        $this->returnMatchResult ?
            preg_match_all($pattern,$subject,$this->matches):
            $this->isMatch=preg_match($pattern,$subject)===1;
        return $this->getRegexResult();
    }

    private function getRegexResult(){
        if($this->returnMatchResult)
        {
            reutrn $this->matches;
        }
        else
        {
            return $this->isMatch;
        }
    }


    public function toggleReturnType($bool=null){
        if(empty($bool))
        {
            $this->returnMatchResult=!$this->returnMatchResult;
        }
        else
        {
            $this->returnMatchResult=is_bool($bool)?$bool:(bool)$bool;
        }
    }

    public function setFixMode($fixMode)
    {
        $this->fixMode=$fixMode;
    }

    public function noEmpty($str)
    {
        return $this->regex('requir',$str);
    }

    public function isEmail($email)
    {
        return $this->regex('email',$email);
    }

    public function isMoblie($mobile)
    {
        return $this->regex('moblie',$mobile);
    }

    public function check($pattern,$subject)
    {
        return $this->regex($pattern,$subject);
    }
)
