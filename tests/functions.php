<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase
{
    public function testCheckInputSuccessLengthOnly() {
        $expected = false;
        $input1 = 0;
        $input2 = 0;
        $input3 = 1.7;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputSuccessPostsOnly() {
        $expected = false;
        $input1 = 2;
        $input2 = 0;
        $input3 = 0;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputSuccessRailingsOnly() {
        $expected = false;
        $input1 = 0;
        $input2 = 1;
        $input3 = 0;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputSuccessPostsRailings() {
        $expected = false;
        $input1 = 2;
        $input2 = 1;
        $input3 = 0;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputFailureTooManyInputs() {
        $expected = true;
        $input1 = 2;
        $input2 = 1;
        $input3 = 2;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputFailureLengthPosts() {
        $expected = true;
        $input1 = 2;
        $input2 = 0;
        $input3 = 2;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputMalformedArray() {
        $expected = true;
        $input1 = 2;
        $input2 = 0;
        $input3 = [ 1, 3, 3 ];

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputMalformedMinusNo() {
        $expected = true;
        $input1 = -3;
        $input2 = 0;
        $input3 = 0;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testCheckInputMalformedEverything0() {
        $expected = true;
        $input1 = 0;
        $input2 = 0;
        $input3 = 0;

        $case = checkInput($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }

    //whatToCalculate tests
    public function testWhatToCalculateSuccessPR() {
        $expected='postsRailings';
        $input1 = 2;
        $input2 = 1;
        $input3 = 0;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testWhatToCalculateSuccessROnly() {
        $expected='railingsOnly';
        $input1 = 0;
        $input2 = 2;
        $input3 = 0;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testWhatToCalculateSuccessPOnly() {
        $expected='postsOnly';
        $input1 = 2;
        $input2 = 0;
        $input3 = 0;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testWhatToCalculateSuccessLOnly() {
        $expected='lengthOnly';
        $input1 = 0;
        $input2 = 0;
        $input3 = 3;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testWhatToCalculateFailure() {
        $expected='oops this shouldn\'t have happened: function whatToCalculate';
        $input1 = 0;
        $input2 = 0;
        $input3 = 0;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testWhatToCalculateMalformed() {
        $expected='oops this shouldn\'t have happened: function whatToCalculate';
        $input1 = [ 0, 3];
        $input2 = 0;
        $input3 = -3;

        $case = whatToCalculate($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }

    //postRailingsCalculator tests
    public function testPostRailingsCalculatorSuccess() {
        $expected = 'Length inputted: 1.7m<br />Posts: 2<br />Railings: 1<br />Total Length of resulting fence: 1.7m<br />';
        $input1 = 1.7;
        $input2 = 0.1;
        $input3 = 1.5;

        $case = postRailingsCalculator($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testPostRailingsCalculatorFailure() {
        $expected = 'Length inputted: -1.7m<br />Posts: 1<br />Railings: 0<br />Total Length of resulting fence: 0.1m<br />';
        $input1 = -1.7;
        $input2 = 0.1;
        $input3 = 1.5;

        $case = postRailingsCalculator($input1, $input2, $input3);
        $this->assertEquals($expected, $case);
    }
    public function testPostsRailingsCalculatorMalformed() {
        $this->expectException(TypeError::class);
        $input1 = [];
        $input2 = 0.1;
        $input3 = 1.5;
        $case = postRailingsCalculator($input1, $input2, $input3);
    }

}