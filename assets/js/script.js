
document.addEventListener('DOMContentLoaded', function() {
    const confirmDelete = () => {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    };
    
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirmDelete()) {
                e.preventDefault();
            }
        });
    });
    
    const validateForm = (formElement) => {
        let valid = true;
        
        const requiredFields = formElement.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('error');
                
                let nextSibling = field.nextElementSibling;
                if (!nextSibling || !nextSibling.classList.contains('error-message')) {
                    const errorMessage = document.createElement('span');
                    errorMessage.classList.add('error-message');
                    errorMessage.style.color = 'red';
                    errorMessage.style.fontSize = '12px';
                    errorMessage.textContent = 'Field ini harus diisi!';
                    field.parentNode.insertBefore(errorMessage, field.nextSibling);
                }
            } else {
                field.classList.remove('error');
                
                let nextSibling = field.nextElementSibling;
                if (nextSibling && nextSibling.classList.contains('error-message')) {
                    nextSibling.remove();
                }
            }
        });
        
        return valid;
    };
    
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
    });
    
    const inputs = document.querySelectorAll('input[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('error');
                
                let nextSibling = this.nextElementSibling;
                if (!nextSibling || !nextSibling.classList.contains('error-message')) {
                    const errorMessage = document.createElement('span');
                    errorMessage.classList.add('error-message');
                    errorMessage.style.color = 'red';
                    errorMessage.style.fontSize = '12px';
                    errorMessage.textContent = 'Field ini harus diisi!';
                    this.parentNode.insertBefore(errorMessage, this.nextSibling);
                }
            } else {
                this.classList.remove('error');
                let nextSibling = this.nextElementSibling;
                if (nextSibling && nextSibling.classList.contains('error-message')) {
                    nextSibling.remove();
                }
            }
        });
    });
    
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 3000);
    });
});