<?php

const DB_HOST = 'TURAN\SQLEXPRESS';
const DB_USERNAME = 'igu';
const DB_PASSWORD = 'igu';
const DB_DATABASE = 'job';

const FLASH = 'flash_data';

const SQL1 = "select count(*) as kayitsayisi, 'aday' as tablo from Aday
            union
            select count(*) as kayitsayisi, 'sirket' as tablo from Sirket
            union
            select count(*) as kayitsayisi, 'ilan' as tablo from Ilan";


const SQL2 = "select count(*) as igumezun from AdayEgitim a 
            join Universite b on a.OkulId=b.UniversiteId
            where a.OkulTipId>3 and a.MezuniyetDurumu=1 and b.UniversiteAdi like '%Gelişim%'";

const SQL3 = "select count(*) as aday, DilAdi from AdayDil a 
            join DilSeviye b on a.KonusmaSeviyeId=b.DilSeviyeId
            join Diller c on c.DilId=a.DilId
            where b.DilSeviyeAdi='Çok İyi'
            group by DilAdi";

const SQL4 = "select * from Aday a 
            join Sehir b on a.SehirId=b.SehirId
            join AskerlikDurum c on a.AskerlikDurumId=c.AskerlikDurumId
            join AdayEgitim d on d.AdayId=a.AdayId
            join Universite e on d.OkulId=e.UniversiteId
            where b.SehirAdi='İstanbul' and c.AskerlikDurumAdi='Tamamlandı'
            and e.UniversiteAdi like '%Orta Dogu Teknik%'";

const SQL5 = "select top 10 count(*) sirket, b.SektorAdi from Sirket a
            join Sektor b on a.SektorId=b.SektorId
            group by b.SektorAdi
            order by 1 desc";

const SQL6 = "select top 10 count(*) as ilan, c.SektorAdi from Ilan a
            join Sirket b on a.SirketId=b.SirketId
            join Sektor c on b.SektorId=c.SektorId
            group by c.SektorAdi
            order by 1 desc";

const SQL7 = "select top 10 count(*) as ilan, c.SehirAdi from Ilan a
            join IlanBasvuru e on e.IlanId=a.IlanId
            join Sirket b on a.SirketId=b.SirketId
            join Sehir c on a.SehirId=c.SehirId
            group by c.SehirAdi
            order by 1 desc";

const SQL8 = "select count(*) as basvuru, 'Farklı şehir' as sehir from Ilan a
            join IlanBasvuru b on b.IlanId=a.IlanId
            join Aday c on c.SehirId<>a.SehirId and c.AdayId=b.AdayId
            union
            select count(*) as basvuru, 'Aynı şehir' as sehir from Ilan a
            join IlanBasvuru b on b.IlanId=a.IlanId
            join Aday c on c.SehirId=a.SehirId and c.AdayId=b.AdayId";

const SQL9 = "select count(*) as basvuru, datepart(month, BasvuruTarihi) as basvuruay, datepart(year, BasvuruTarihi) as basvuruyil
            from IlanBasvuru
            group by datepart(month, BasvuruTarihi), datepart(year, BasvuruTarihi)
            order by 3,2";

const SQL10 = "select distinct Adi, Soyadi, datediff(year,a.DogumTarihi,getdate()) as yasi, a.TelefonNo, TalebEdilenMaas, BasvuruTarihi,SirketAdi, SehirAdi
            from Aday a
            join AdayEgitim b on a.AdayId=b.AdayId
            join IlanBasvuru c on c.AdayId=a.AdayId
            join Ilan d on c.IlanId=d.IlanId
            join Sirket e on e.SirketId=d.SirketId
            join Sehir f on f.SehirId=d.SehirId
            where datediff(year,a.DogumTarihi,getdate()) between 25 and 32
            and b.OkulTipId>3
            and (select sum(BitisYili-BaslangicYili) from AdayDeneyim c where c.AdayId=a.AdayId) between 10 and 15
            and d.SehirId in(34,35)
            and c.TalebEdilenMaas between 20000 and 30000";

const SQL11 = "select distinct top 10 Adi, Soyadi, a.TelefonNo, BasvuruTarihi,SirketAdi, SehirAdi, TalebEdilenMaas, 
            (select top 1 c.AldigiMaas from AdayDeneyim c where c.AdayId=a.AdayId order by c.AdayDeneyimId desc) as EnSonMaas
            from Aday a
            join IlanBasvuru c on c.AdayId=a.AdayId
            join Ilan d on c.IlanId=d.IlanId
            join Sirket e on e.SirketId=d.SirketId
            join Sehir f on f.SehirId=d.SehirId
            where TalebEdilenMaas >= 2*(select top 1 c.AldigiMaas from AdayDeneyim c where c.AdayId=a.AdayId order by c.AdayDeneyimId desc)
            and c.BasvuruDurumu=1";