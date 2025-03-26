<?php
namespace Projeto\Handler;

class TypeHandler
{
    const VALIDATION_TYPE = [
        'email' => 1,
        'cpf'   => 2,
    ];

    static function validate(string $content, string $type)
    {
        switch(Self::VALIDATION_TYPE[$type])
        {
            case 1: return Self::validateCpf($content);
                    break;
            case 2: return Self::validateEmail($content);
                    break;
        }
    }

    private function validateCpf(string $cpf)
    {
        $tempCpf = explode('', $cpf);
        if(count($tempCpf) <> 11)
        {
            return false;
        }
        foreach($tempCpf as $char)
        {
            if(!is_numeric($char))
            {
                return false;
            }
        }
        $primeiroDigito = Self::getPrimeiroDigitoCpf($tempCpf);
        if($primeiroDigito <> $tempCpf[10])
        {
            return false;
        }
        if($primeiroDigito != $tempCpf[10])
        {
            return false;
        }
        $segundoDigito = Self::getSegundoDigitoCpf($tempCpf);
        if($segundoDigito != $tempCpf[11])
        {
            return false;
        }
        return true;
    }

    private function getPrimeiroDigitoCpf(array $cpf)
    {
        $sum = 0;
        $pos = 10;
        for($i = 0; $i < count($cpf)-2; $i++)
        {
            $sum += $cpf[$i] * $pos;
            $pos--;
        }
        $digito = 11 - ($sum % 11);
        return $digito;
    }

    private function getSegundoDigitoCpf(array $cpf)
    {
        $sum = 0;
        $pos = 11;
        for($i = 0; $i < count($cpf)-1; $i++)
        {
            $sum += $cpf[$i] * $pos;
            $pos--;
        }
        $digito = 11 - ($sum % 11);
        return $digito;        
    }

    private function validateEmail(string $email)
    {

    }
}