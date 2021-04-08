<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;



  /*
     https://www.youtube.com/watch?v=vB7Z60HvO1k
     theme => Php Unit , pruebas unitarias , affirmaciones en php unit , una affirmacion simplemente analiza resultado de una clase

  */
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testEguals(){
       $result = 5 + 5;

       $this->assertEquals( $result , 10); /* == */
    }

    public function testSame(){
        $result = 5 + 5;

        $this->assertSame( $result , 10); /* === */
    }
    public function testArray(){

        $this->assertIsArray( [] );
    }
    public function testBool(){

        $this->assertIsBool(true);
    }



}
