<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Analytics Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header id="header">
        <nav>
            <a href="index.php" class="logo">BMI<span>HealthCare</span></a>
            <div class="nav-links">
                <a href="#Homes" class="active">Home</a>
                <a href="#knowledge">Factors</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="about.php">About</a>
                
            </div>
        </nav>
    </header>

    <main>

      <section id="Homes" class="hero">
            <h1>Explore the factors that affects BMI with us</h1>
            <p>Powerful analytics and insights to help you make data-driven decisions with confidence.</p>
            <div>
                <a href="dashboard.php" class="btn">View Dashboard</a>
                <a href="#BMIcalc" class="btn" style="margin-left: 1rem; background-color: transparent; border: 2px solid white; color: white;">BMI Calculator</a>
            </div>
      </section>

      <section id="knowledge" class="knowledge-section">
       <h2>Understanding the Key Factors Influencing BMI</h2>
  
    <div class="factor">
        <h3>HDL (High-Density Lipoprotein)</h3>
        <p>
            HDL is often referred to as the "good" cholesterol. It helps remove excess cholesterol from your bloodstream and protects against heart disease. A higher HDL level is generally a sign of good cardiovascular health. It has a close relationship with BMI as higher BMI often leads to lower levels of HDL.
        </p>
    </div>

    <div class="factor">
        <h3>Waist Circumference</h3>
        <p>
            Waist circumference is an indicator of abdominal fat. A larger waistline can signify a higher risk of heart disease, type 2 diabetes, and other health issues. It's often used in conjunction with BMI to assess the risk of metabolic conditions, especially if BMI is high and waist circumference exceeds healthy thresholds.
        </p>
    </div>

    <div class="factor">
        <h3>Triglycerides</h3>
        <p>
            Triglycerides are a type of fat found in the blood. High levels of triglycerides are associated with an increased risk of heart disease and stroke. When BMI increases, triglyceride levels tend to rise, making it an important factor to monitor for overall health.
        </p>
    </div>

    <div class="factor">
        <h3>Blood Glucose</h3>
        <p>
            Blood glucose refers to the amount of sugar (glucose) in the blood. High blood glucose levels are often linked to obesity and insulin resistance. Maintaining a healthy BMI is essential in controlling blood sugar and reducing the risk of developing type 2 diabetes.
        </p>
    </div>

    <div class="factor">
        <h3>Metabolic Syndrome</h3>
        <p>
            Metabolic syndrome is a group of conditions that increase the risk of heart disease, stroke, and diabetes. These include high blood pressure, high blood sugar, excess body fat around the waist, and abnormal cholesterol levels. A higher BMI is a significant factor in developing metabolic syndrome.
        </p>
    </div>

    <div class="factor">
        <h3>Uric Acid</h3>
        <p>
            Uric acid is a waste product that forms when the body breaks down purines (found in certain foods). High levels of uric acid can lead to gout and kidney problems. Elevated BMI can lead to higher uric acid levels, increasing the risk of gout and other health issues.
        </p>
    </div>

</section>


      <section id="BMIcalc" class="bmi-section">
        <h2>Calculate your BMI!</h2>
        <form id="bmi-form">
         <div class="input-group">
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" required>
         </div>
         <div class="input-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>
         </div>
         <button type="submit" id="calculate-bmi">Calculate BMI</button>
        </form>

         <div id="result" class="result hidden">
          <h3>Your BMI:</h3>
          <p id="bmi-value">--</p>
          <p id="bmi-category">--</p>
         </div>
      </section>

    </main>

    <footer>
    <div class="footer-content">
        <div class="footer-main">
            <div class="footer-links">
                <a href="#Homes">Home</a>
                <a href="index.php#knowledge">Factors</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="about.php">About</a>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-contact">
                <p>Contact Us</p>
                <p>Phone: +6011-39860847</p>
                <p>Email: 2022883044@student.uitm.edu.my</p>
            </div>
        </div>
        <p>&copy; 2023 BMIHealthCare Analytics. All rights reserved.</p>
    </div>
</footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Active link highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-links a');

            window.addEventListener('scroll', function() {
                let current = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    
                    if (pageYOffset >= (sectionTop - 200)) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${current}` || 
                        (current === '' && link.getAttribute('href') === 'index.php')) {
                        link.classList.add('active');
                    }
                });
            });
        });
// JavaScript for calculating BMI and displaying the result
document.getElementById('bmi-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get height and weight from form inputs
    const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to meters
    const weight = parseFloat(document.getElementById('weight').value);

    // Calculate BMI
    const bmi = weight / (height * height);
    const bmiValue = bmi.toFixed(2);

    // Determine BMI category and set class for color
    let category = '';
    let categoryClass = '';

    // Reset the result class before applying a new one
    const resultCategory = document.getElementById('bmi-category');
    resultCategory.classList.remove('underweight', 'normal', 'overweight', 'obese');

    if (bmi < 18.5) {
        category = 'Underweight';
        categoryClass = 'underweight';
    } else if (bmi >= 18.5 && bmi < 24.9) {
        category = 'Normal';
        categoryClass = 'normal';
    } else if (bmi >= 25 && bmi < 29.9) {
        category = 'Overweight';
        categoryClass = 'overweight';
    } else {
        category = 'Obese';
        categoryClass = 'obese';
    }

    // Display the result
    document.getElementById('bmi-value').textContent = bmiValue;
    document.getElementById('bmi-category').textContent = category;
    document.getElementById('result').classList.remove('hidden');
    document.getElementById('bmi-category').classList.add(categoryClass);
});

    </script>
</body>
</html>