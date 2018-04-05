SELECT 
    t.id, 
    t.chrNome, 
    t.chrSobrenome, 
    t.chrCEP,
    t.chrUF,
    t.chrCidade,
    t.chrBairro, 
    t.chrLogradouro, 
    t.chrNumero, 
    t.chrComplemento 
FROM registro t
WHERE 
    (
        t.chrNome LIKE :filter1 
        OR t.chrSobrenome LIKE :filter2 
        OR t.chrCidade LIKE :filter3
    )
ORDER BY {order} {dir}
LIMIT {start}, {limit};