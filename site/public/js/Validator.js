class Validator {
    constructor(form) {
        this.patterns = {
            name: /^[a-zа-яА-ЯЁё]+$/i,
            lastname: /^[a-zа-яА-ЯЁё]+$/i,
            password: /^[a-zA-Z0-9]{3,20}$/,
            // password: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
            passwordCheck: '',
            login: /^[a-zA-Z0-9]{4,20}$/,
            email: /^[\w._-]+@\w+\.\w{2,4}$/i
        };

        this.password = null,
        this.passwordCheck = null,
        this.form = form;
        this.valid = false;
        this._validateForm(this.form);
    }
    _validateForm(form){
        let errors = [...document.getElementById(form).querySelectorAll(`.is-invalid`)];
        for (let error of errors){
            error.classList.remove('is-invalid');
        }
        let formFields = [...document.getElementById(form).getElementsByTagName('input')];
        for (let field of formFields){
            this._validate(field);
        }
        if(![...document.querySelectorAll('.is-invalid')].length){
            this.valid = true;
        }
    }
    _validate(field){
        if(this.patterns[field.name]){
            if(!this.patterns[field.name].test(field.value)){
               field.classList.add('is-invalid');
               this._watchField(field);
            }
        }
        if (field.name === 'password') {
            this.password = field.value;
        }
        if (field.name === 'passwordCheck') {
            if(field.value !== this.password) {
                field.classList.add('is-invalid');
                this._watchField(field);
            }
        }
    }
    _watchField(field){
        field.addEventListener('input', () => {
            if (field.name === 'password') {
                this.password = field.value;
                this.patterns.passwordCheck = new RegExp(field.value);
            }

            if(this.patterns[field.name].test(field.value)){
                field.classList.remove('is-invalid');
                field.classList.add('valid');
                if(field.parentNode.lastChild !== field){
                    field.parentNode.lastChild.remove();
                }
            } else {
                field.classList.remove('valid');
                field.classList.add('is-invalid');

            }
        })
    }
}