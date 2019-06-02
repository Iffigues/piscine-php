SELECT COUNT(id_sub) as 'nb_susc', FLOOR(sum(price) / count(price)) as 'av_susc', MOD(sum(duration_sub),42)  as 'ft'
FROM subscription;
