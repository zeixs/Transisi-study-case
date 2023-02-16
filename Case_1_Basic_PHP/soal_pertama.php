public function first(){
    $nilai = '72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86';
    $nilaiInt = array_map('intval', explode(' ', $nilai));
    $average = array_sum($nilaiInt)/count($nilaiInt);
    $sorted = [];
    rsort($nilaiInt);
    foreach ($nilaiInt as $key => $val) {
        array_push($sorted,[$key => $val]);
    };
    $data = [
        'average' => $average,
        '7 highest'   => [$sorted[0],$sorted[1], $sorted[2], $sorted[3], $sorted[4], $sorted[5], $sorted[6]],
        '7 lowest'   => [$sorted[20],$sorted[19], $sorted[18], $sorted[17], $sorted[16], $sorted[15], $sorted[14]],
    ];
    return $data;
}

    