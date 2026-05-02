<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Join KBEC</title>
  <link rel="stylesheet" href="form.css" />
</head>

<body>
  <div class="container">
    <h1>Join KBEC</h1>
    <p>Fill out the form to become a member</p>

    <form action="process.php" method="POST">

      <!-- Personal Info -->
      <fieldset>
        <legend>Personal Information</legend>

        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />

        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" />

        <label for="department">Department</label>
        <select id="department" name="department">
          <optgroup label="Engineering">
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
            <option value="ME">ME</option>
            <option value="CE">CE</option>
            <option value="ECE">ECE</option>
            <option value="MSE">MSE</option>
            <option value="MTE">MTE</option>
            <option value="ChE">ChE</option>
            <option value="ESE">ESE</option>
            <option value="BECM">BECM</option>
            <option value="LE">LE</option>
            <option value="TE">TE</option>
          </optgroup>
          <optgroup label="Others">
            <option value="Architecture">Architecture</option>
            <option value="URP">URP</option>
          </optgroup>
        </select>

        <!-- Roll -->
        <label for="roll">Roll Number</label>
        <input type="text" id="roll" name="roll" placeholder="Enter your roll" />

        <!-- Gender -->
        <label>Gender</label>
        <div class="checkbox-group">
          <label><input type="radio" name="gender" value="Male" /> Male</label>
          <label><input type="radio" name="gender" value="Female" /> Female</label>
          <label><input type="radio" name="gender" value="Other" /> Other</label>
        </div>
      </fieldset>

      <!-- Skills -->
      <fieldset>
        <legend>Skills & Interests</legend>

        <label for="skills">Select Skill</label>
        <input list="skillList" id="skills" name="skill" placeholder="Choose or type" />
        <datalist id="skillList">
          <option value="Marketing"></option>
          <option value="Public Speaking"></option>
          <option value="Design"></option>
          <option value="Programming"></option>
        </datalist>

        <label for="interest">Why do you want to join?</label>
        <textarea id="interest" name="interest" rows="4" placeholder="Write your motivation..."></textarea>
      </fieldset>

      <!-- Experience -->
      <fieldset>
        <legend>Experience</legend>

        <label for="experience">Experience Level (1-10)</label>
        <input type="range" id="experience" name="experience" min="1" max="10"
          oninput="output.value = experience.value" />
        <output name="output">5</output>
      </fieldset>

      <!-- Submit -->
      <button type="submit">Submit Application</button>

    </form>
  </div>
</body>

</html>