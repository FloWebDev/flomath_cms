const app = {
    init: () => {
        if (document.querySelector('#comment-form')) {
            document.querySelector('#comment-form').addEventListener('submit', app.handleCommentForm);
        }
        if (document.querySelector('#container-comment-flash-messages')) {
            document.querySelector('#container-comment-flash-messages').style.display = 'none';
        }
    },
    handleCommentForm: (e) => {
        e.preventDefault();
        var xhr = new XMLHttpRequest();
        var data = new FormData(e.target);

        xhr.open('POST', e.target.getAttribute('action'), true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const res = JSON.parse(xhr.response);
                    if (res.success) {
                        e.target.reset();
                        app.handleSuccessCommentForm(res);
                        setTimeout(() => {
                            document.location.reload();
                        }, 3000);
                    }
                } else {
                    app.handleErrorCommentForm(JSON.parse(xhr.response));
                }
            }
        };

        xhr.send(data); 
    },
    handleErrorCommentForm: (errors) => {
        document.querySelector('#comment-flash-messages').innerHTML = errors.join('<br>');
        document.querySelector('#container-comment-flash-messages').classList.remove('alert-success');
        document.querySelector('#container-comment-flash-messages').classList.add('alert-danger');
        document.querySelector('#container-comment-flash-messages').style.display = 'block';
    }, 
    handleSuccessCommentForm: (res) => {
        document.querySelector('#comment-flash-messages').textContent = res.message;
        document.querySelector('#container-comment-flash-messages').classList.remove('alert-danger');
        document.querySelector('#container-comment-flash-messages').classList.add('alert-success');
        document.querySelector('#container-comment-flash-messages').style.display = 'block';
    }
};

document.addEventListener('DOMContentLoaded', app.init);