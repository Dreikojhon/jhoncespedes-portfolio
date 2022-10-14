import notyf from './notyf'

const send = (form) => {
    return fetch(form.action, {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
        body: JSON.stringify(Object.values(form.elements).slice(0, -1)
            .reduce((acc, input) => ({ ...acc, [input.name]: input.value }), {})
        )
    })
    .then((response) => {
        return response.status === 200 ? response : Promise.reject({ response })
    });
};

const contactForm = document.forms[0];

if (contactForm) {
    contactForm.onsubmit = (e) => {
        e.preventDefault();
        e.target.elements['submit'].disabled = true;

        send(contactForm)
            .then((response) => {
                notyf.success('El mensaje ha sido enviado.');
                contactForm.reset();
            })
            .catch((error) => {
                notyf.error('Envío incorrecto, por favor intentelo más tarde.');
                console.log(error.response);
            })
            .finally(() => {
                contactForm.elements['submit'].disabled = false;
            });
    };
}
