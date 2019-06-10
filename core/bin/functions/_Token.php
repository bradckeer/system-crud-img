<?php 

$bbs = new BlumBlumShub(400);
var_dump(bin2hex($bbs->getRandomPseudoBytes(32)));
// out like 02b3b55d6aea2f26a0ddfcd8967597fb0d38d7c6c4027f0595f5a614b9f06400

class BlumBlumShub
{
    private $p, $q, $s, $m, $init, $x0;
    private $size = 1024;

    public function __construct($size = false, $p = false, $q = false, $s = false)
    {
        if($p !== false && $q !== false && $s !== false)
        {
            $this->p = $p;
            $this->q = $q;
            $this->m = bcmul($p, $q);
            $this->s = $s;
        } else {
            if($size !== false)
                $this->size = $size;
            $this->init();
        }
        
        $this->xn = bcmod(bcmul($this->s, $this->s), $this->m);
        for($i=0;$i<10;$i++)
            $this->xn = bcmod(bcmul($this->xn, $this->xn), $this->m);
    }
    
    private function init()
    {
        $this->p = $this->genPrime();
        $this->q = $this->genPrime();
        $this->m = bcmul($this->p, $this->q);
        
        $mCoPrime = gmp_init($this->m);

        # try find co-prime
        while(1)
        {
            $s = genPrime($this->size);
            $sCoPrime = gmp_init($s);
            $g = gmp_gcdext($mCoPrime, $sCoPrime);
            $g = gmp_strval($g['g']);
            if($g === '1')
                break;
        }

        $this->s = $s;
    }
    
    public function genPrime()
    {
        while(1)
        {
            $min = gmp_init(str_pad('1', $this->size, '0'));
            $max = gmp_init(str_pad('9', $this->size, '0'));
            $prime = gmp_strval(gmp_random_range($min, $max));

            $validate = bcmod($prime, '4');
            if($validate === '3')
                break;
        }

        return $prime;
    }
    
    public function getRandomPseudoBytes($length)
    {
        $bytes = '';
    
        for($i=0;$i<$length;$i++)
            $bytes .= $this->getByte();
        
        return $bytes;
    }
    
    public function getByte()
    {
        $byte = '';

        for($i=0;$i<8;$i++) {
            $this->xn = bcmod(bcmul($this->xn, $this->xn), $this->m);
            $byte .= substr(decbin($this->xn[strlen($this->xn)-1]), -1);
        }
        
        return chr(bindec($byte));
    }
}

