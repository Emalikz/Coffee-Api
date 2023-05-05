# Para consultar el producto más vendido
select * from products p  where p.id = (select sells.product_id from sells group by product_id order by count(*) desc limit 1)

# Para consultar el producto con más stock
select * from products p order by stock desc limit 1
