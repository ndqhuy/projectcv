// đổi màu chữ, background của form cv
function changeBackgroundColor(elementId, color) {
    document.getElementById(elementId).style.backgroundColor = color;
}

function changeTextColor(elementId, color) {
    document.getElementById(elementId).style.color = color;
}
// form cv
// Lấy các phần tử từ DOM
const applyButton = document.getElementById('applyButton');
const applicationForm = document.getElementById('applicationForm');
const jobDetail = document.querySelector('.job-detail');

// Xử lý sự kiện khi nhấn vào nút ứng tuyển
applyButton.addEventListener('click', () => {
    // Hiển thị form ứng tuyển
    applicationForm.style.display = 'block';

    // Làm mờ nội dung phía dưới
    jobDetail.classList.add('blurred');
});