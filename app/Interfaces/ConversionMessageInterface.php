<?php namespace Cfair\Interfaces;

interface ConversionMessageInterface {

    public function getAll();

    public function find($id);

    public function create($input);
}