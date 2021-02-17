
## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Fill in `.env` with your Stripe credentials
- Add your Stripe plan IDs in `roles` DB table directly or in Seed file
- That's it: launch the main URL. 
- You can click Login to enter with admin credentials __admin@admin.com__ - __password__
- Or you can click Register / TRY NOW - you will be assigned a Free Plan until you choose the plan to upgrade

