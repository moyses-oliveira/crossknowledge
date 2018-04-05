<?php

namespace CrossKnowledge\Data\Inspector;

/**
 * Description of User
 *
 * @author moyses-oliveira
 */
class Registro {

    private $id;
    private $chrNome;
    private $chrSobrenome;
    private $chrCEP;
    private $chrUF;
    private $chrCidade;
    private $chrBairro;
    private $chrLogradouro;
    private $chrNumero;
    private $chrComplemento;

    function getId(): ?int {
        return $this->id;
    }

    function setId(?int $id) {
        $this->id = $id;
    }

    function getChrNome(): string {
        return $this->chrNome;
    }

    function getChrSobrenome(): string {
        return $this->chrSobrenome;
    }

    function getChrCEP(): string {
        return $this->chrCEP;
    }

    function getChrUF(): string {
        return $this->chrUF;
    }

    function getChrCidade(): string {
        return $this->chrCidade;
    }

    function getChrBairro(): string {
        return $this->chrBairro;
    }

    function getChrLogradouro(): string {
        return $this->chrLogradouro;
    }

    function getChrNumero(): string {
        return $this->chrNumero;
    }

    function getChrComplemento(): ?string {
        return $this->chrComplemento;
    }

    function setChrNome(string $chrNome) {
        $this->chrNome = $chrNome;
    }

    function setChrSobrenome(string $chrSobrenome) {
        $this->chrSobrenome = $chrSobrenome;
    }

    function setChrCEP(string $chrCEP) {
        $this->chrCEP = $chrCEP;
    }

    function setChrUF(string $chrUF) {
        $this->chrUF = $chrUF;
    }

    function setChrCidade(string $chrCidade) {
        $this->chrCidade = $chrCidade;
    }

    function setChrBairro(string $chrBairro) {
        $this->chrBairro = $chrBairro;
    }

    function setChrLogradouro(string $chrLogradouro) {
        $this->chrLogradouro = $chrLogradouro;
    }

    function setChrNumero(string $chrNumero) {
        $this->chrNumero = $chrNumero;
    }

    function setChrComplemento(?string $chrComplemento) {
        $this->chrComplemento = $chrComplemento;
    }

}
