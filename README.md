# Todo App

Ky është një projekt i thjeshtë për menaxhimin e detyrave që përdor **Laravel**, **Breeze** për autentifikim dhe **Bootstrap** për dizajnin e ndërfaqes.

## Instalimi dhe Konfigurimi

1. **Klononi depozitat nga GitHub**:

    ```bash
    git clone https://github.com/username/todo-app.git
    ```

2. **Kalo në folderin e projektit**:

    ```bash
    cd Laravel-Task-Manager
    ```

3. **Instaloni varësitë e projektit me Composer**:

    ```bash
    composer install
    ```

4. **Krijoni një kopje të `env` nga `env.example` dhe bëni konfigurimet e nevojshme**:

    ```bash
    cp .env.example .env

    ```


5. **Konfiguroni bazën e të dhënave**:

    - Hapni `config/database.php` dhe sigurohuni që informacionet e lidhjes me bazën e të dhënave janë të sakta.
    - Fushat qe duhen ndryshuar ne .env
    ```
    DB_CONNECTION=db-conn
    DB_HOST=your-host
    DB_PORT=database-port
    DB_DATABASE=database-name
    DB_USERNAME=your-user
    DB_PASSWORD=your-password

    ```

    - Përdorni komandën `php artisan migrate` për të krijuar tabelat në bazën e të dhënave:

    ```bash
    php artisan migrate

    php artisan key:generate


    ```

## Përdorimi

Pasi të keni instaluar dhe konfiguruar projektin, mund të filloni përdorimin e aplikacionit.

1. **Për të filluar serverin e zhvillimit të Laravel**:



    ```bash
    npm install
    npm run dev
    php artisan serve
    ```

    Ky do të nisë serverin në adresën `http://127.0.0.1:8000`.

2. **Përdorimi i Breeze për autentifikim**:

    Breeze ofron një sistem të thjeshtë të autentifikimit me `login` dhe `register`. Ju mund të krijoni një llogari të re ose të kyçeni me një të ekzistuese duke përdorur email dhe fjalëkalim.

    - Për të krijuar një përdorues të ri, mund të regjistroheni në aplikacion duke përdorur formularin `register`.
    - Pasi të regjistroheni, mund të kyçeni me të dhënat që krijuat.

3. **Shtimi, modifikimi dhe fshirja e detyrave**:

    - Kur të kyçeni në aplikacion, mund të krijoni detyra të reja, të modifikoni ose të fshini ato ekzistuese.
    - Mund të filtroni detyrat sipas statusit dhe prioriteteve.






