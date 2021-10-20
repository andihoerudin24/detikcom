## detikcom


### Branching
- main -> production
- develop -> development
- feature/feature-name -> new feature
- enhancement/case-name -> improved functionality, user interface, or user experience
- bugfix/bug-name -> bug fix

## Teknologi
    - Php native
    - Mysql
## HOW TO USE
   - download xampp link download : https://www.apachefriends.org/download.html
   - start xampp apche dan mysql
   - buat database dengan nama detikcom
   - pindahkan folder aplikasi ke dalam xampp/htdocs
   - untuk configurasi database name database password ada di dlm folder config/config.php silahkan masukan database name,user,password 
   - import database yang telah di sediakan 
   - untuk mencobat rest api ini donwload postman terlbih dahulu link download:https://www.postman.com/
   - import postman yang telah di sediakan 
   - contoh end point create transaction url: http://localhost/detikcom/public/Home/addTransaction params:invoice_id,item_name,amount,payment_type enum('credit_card','virtual_account'), merchant_id (isi data merchant_id lihat table master merchent dan pilih salah satu merchant_id) untuk detail lebih jelas nya ada di contoh postman yang telah di sediakan silahkan di import
   - contoh endpoint get status transaction url: http://localhost/detikcom/public/home/GetStatusTransaksi/{references_id}/{merchant_id}. untuk melihat status transaction ada references_id yaitu di dapat dari respon setelah membuat transaksi, dan ada merchant_id yaitu parametes merchant_id yang di masukan pada saat create transaksi.
   - contoh endpoint untuk update transaksi url: http://localhost/detikcom/public/Home/updatetransaction. dengan method post dan body isi invoice_id di dapat dari idinvoice pada saat create transaksi dan status enum (Pending,Paid,Paid). untuk contoh lebih jelas ada di postman yang telah di sediakan 


 