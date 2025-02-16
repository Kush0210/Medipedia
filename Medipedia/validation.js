const validation = new JustValidate("#sign-up");

validation
    .addField("#dname", [
        {
            rule: "required"
        }
    ])
    .addField("#dHname", [
        {
            rule: "required"
        }
    ])
    .addField("#dmain", [
        {
            rule: "required"
        }
    ])
    .addField("#dEmail", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "email already taken"
        }
    ])
    .addField("#dpass", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#dcpass", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("sign-up").submit();
    });