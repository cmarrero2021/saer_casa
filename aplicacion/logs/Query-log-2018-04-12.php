SELECT "id_piso", "piso"
FROM "pisos"
ORDER BY "id_piso" 
 Execution Time:0.001068115234375

SELECT "id_oficina", "oficina"
FROM "oficinas"
ORDER BY "oficina" 
 Execution Time:0.00063085556030273

SELECT a.id_destino,b.piso,c.oficina,a.destino FROM destinos a left join pisos b on b.id_piso = a.id_piso left join oficinas c on c.id_oficina = a.id_oficina ORDER BY id_destino ASC  
 Execution Time:0.0020089149475098

SELECT a.id_destino,b.piso,c.oficina,a.destino FROM destinos a left join pisos b on b.id_piso = a.id_piso left join oficinas c on c.id_oficina = a.id_oficina where a.id_destino = 1 
 Execution Time:0.0014030933380127

UPDATE "destinos" SET "id_piso" = '1', "id_oficina" = '14', "destino" = 'TRANSPORTE'
WHERE "id_destino" = '1' 
 Execution Time:0.0056471824645996

SELECT a.id_destino,b.piso,c.oficina,a.destino FROM destinos a left join pisos b on b.id_piso = a.id_piso left join oficinas c on c.id_oficina = a.id_oficina ORDER BY id_destino ASC  
 Execution Time:0.0022921562194824

