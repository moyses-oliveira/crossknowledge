SELECT 
    COUNT(0) as total
FROM registro t
WHERE 
    (
        t.chrNome LIKE :filter1 
        OR t.chrSobrenome LIKE :filter2 
        OR t.chrCidade LIKE :filter3
    );