## How to Run the Project Locally

### Steps

1. **Open your terminal** (or Command Prompt).

2. **Navigate to your project directory** — the one that contains the `/public` folder:

   ```bash
   cd path/to/your_project
   ```

3. **Start the PHP development server**:

   ```bash
   php -S localhost:8000 -t public
   ```

### Explanation

* `localhost:8000` → Runs your app on port **8000**.
* `-t public` → Serves files from the **public** directory (your web root).

### View in Browser

Open your browser and go to:

```
http://localhost:8000
```

You should now see your **home.php** page displayed.
