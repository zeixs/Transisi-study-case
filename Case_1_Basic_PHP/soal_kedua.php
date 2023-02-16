public function second(){
    $str = 'TranSISI';
    $lower = 0;
    for ($i = 0; $i < strlen($str); $i++)
    {
        if ($str[$i] >= 'a' &&
                $str[$i] <= 'z')
            $lower++;
    }
    return ('"'.$str.'"'. ' mengandung '.$lower.' buah huruf kecil.') ;
}