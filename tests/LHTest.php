<?php

namespace Levitated\Helpers;

class LHTest extends \PHPUnit_Framework_TestCase {

    public function testGetValValueDefault() {
        $default = 'foo';
        $this->assertSame(LH::getVal(null, null), null);
        $this->assertSame(LH::getVal(null, null, $default), $default);
        $this->assertSame(LH::getVal(null, false, $default), $default);
        $this->assertSame(LH::getVal(null, 0, $default), $default);
        $this->assertSame(LH::getVal(null, '', $default), $default);
    }

    public function testGetValArray() {
        $arr = ['foo' => 'bar'];
        $this->assertSame(LH::getVal('foo', $arr), 'bar');
    }

    public function testGetValArrayDefault() {
        $default = 'foo';
        $arr = ['foo' => 'bar'];
        $this->assertSame(null, LH::getVal('invalid', $arr));
        $this->assertSame($default, LH::getVal('invalid', $arr, $default));
    }

    public function testGetValValue() {
        $default = 'foo';
        $this->assertSame(true, LH::getVal(null, true, $default));
        $this->assertSame(1, LH::getVal(null, 1, $default));
        $this->assertSame('bar', LH::getVal(null, 'bar', $default));
    }

    public function testIsObjectEmpty() {
        $this->assertTrue(LH::isObjectEmpty(false));
        $this->assertTrue(LH::isObjectEmpty(null));
        $this->assertTrue(LH::isObjectEmpty(0));
        $this->assertTrue(LH::isObjectEmpty(''));
        $this->assertTrue(LH::isObjectEmpty([]));
        $this->assertTrue(LH::isObjectEmpty([false, null, 0, '']));
        $this->assertTrue(LH::isObjectEmpty([[], []]));
        $this->assertTrue(LH::isObjectEmpty(['foo' => [], 'bar' => []]));
        $this->assertTrue(LH::isObjectEmpty(['foo' => [], 'bar' => [['foobar' => false]]]));
        $this->assertTrue(LH::isObjectEmpty(['foo' => null]));
        $this->assertTrue(LH::isObjectEmpty(['foo' => false]));
        $this->assertTrue(LH::isObjectEmpty(['foo' => '']));

        $this->assertFalse(LH::isObjectEmpty(true));
        $this->assertFalse(LH::isObjectEmpty(1));
        $this->assertFalse(LH::isObjectEmpty([true, 1, '']));
        $this->assertFalse(LH::isObjectEmpty([[true], []]));
        $this->assertFalse(LH::isObjectEmpty(['foo' => true]));
    }

    public function testImplodeWithAndDefault() {
        $this->assertSame('', LH::implodeWithAnd([]));
        $this->assertSame('foo', LH::implodeWithAnd(['foo']));
        $this->assertSame('foo and bar', LH::implodeWithAnd(['foo', 'bar']));
        $this->assertSame('foo, bar and foobar', LH::implodeWithAnd(['foo', 'bar', 'foobar']));
    }
}

