const loginButton = document.getElementById('login');
const registerButton = document.getElementById('register');
const button = document.getElementById('btn');
const error = document.getElementById('error');
const progressRings = document.querySelectorAll('.progress-ring__circle');
const searchModal = document.getElementById('searchModal');

const dropdownStatus = {
    1: false,
    2: false,
    3: false,
    4: false,
    5: false,
    6: false,
    7: false,
    8: false,
    9: false,
    10: false,
    11: false,
    12: false,
    13: false,
    14: false,
};

const meetingCompletionStatus = {
    1: true,
    2: false,
    3: false,
    4: false,
    5: false,
    6: false,
    7: false,
    8: false,
    9: false,
    10: false,
    11: false,
    12: false,
    13: false,
    14: false,
};

const register = () => {
    loginButton.style.display = 'none';
    registerButton.style.display = 'block';
    button.style.left = '105px';
};

const login = () => {
    loginButton.style.display = 'block';
    registerButton.style.display = 'none';
    button.style.left = '0';
};

const closed = () => {
    error.style.display = 'none';
};

const dropdown = () => {
    document.querySelector('#submenu').classList.toggle('hidden');
    document.querySelector('#arrow').classList.toggle('rotate-180');
};

const openSidebar = () => {
    document.querySelector('.sidebar').classList.remove('2md:ml-0');
    document.querySelector('.sidebar').classList.toggle('-ml-[99999px]');
    document.querySelector('.sidebar').classList.toggle('ml-0');
};

const toggleDropdown = (index) => {
    const submenuId = `#submenup${index}`;
    const arrowId = `#arrowp${index}`;

    for (const key in dropdownStatus) {
        if (dropdownStatus[key] && key !== index.toString()) {
            const prevSubmenuId = `#submenup${key}`;
            const prevArrowId = `#arrowp${key}`;
            document.querySelector(prevSubmenuId).classList.add('hidden');
            document.querySelector(prevArrowId).classList.remove('rotate-180');
            dropdownStatus[key] = false;
        }
    }

    const submenu = document.querySelector(submenuId);
    const arrow = document.querySelector(arrowId);
    if (dropdownStatus[index]) {
        submenu.classList.add('hidden');
        arrow.classList.remove('rotate-180');
    } else {
        submenu.classList.remove('hidden');
        arrow.classList.add('rotate-180');
    }

    dropdownStatus[index] = !dropdownStatus[index];
};

const updateButtonStatusBasedOnDatabase = () => {
    for (let i = 1; i <= 14; i++) {
        const buttonId = `pertemuan${i}`;
        const buttonElement = document.getElementById(buttonId);
        const meetingStatus = meetingCompletionStatus[i];

        if (meetingStatus) {
            buttonElement.removeAttribute('disabled');
            buttonElement.setAttribute('title', '');
        } else {
            buttonElement.setAttribute('disabled', 'true');
            buttonElement.setAttribute(
                'title',
                'Anda belum menyelesaikan pertemuan sebelumnya'
            );
        }
    }
};

updateButtonStatusBasedOnDatabase();

const handleMeetingButtonClick = (index) => {
    meetingCompletionStatus[index] = true;
    updateButtonStatusBasedOnDatabase();
};

const updateIconBasedOnButtonStatus = (index) => {
    const iconId = `iconp${index}`;
    const iconElement = document.getElementById(iconId);

    if (meetingCompletionStatus[index]) {
        iconElement.setAttribute('name', 'chevron-down-outline');
    } else {
        iconElement.setAttribute('name', 'lock-closed-outline');
    }
};

for (let i = 1; i <= 14; i++) {
    updateIconBasedOnButtonStatus(i);
}

for (let i = 1; i <= 14; i++) {
    const buttonId = `pertemuan${i}`;
    const buttonElement = document.getElementById(buttonId);

    buttonElement.addEventListener('click', () => {
        handleMeetingButtonClick(i);
        updateIconBasedOnButtonStatus(i);
    });
}

progressRings.forEach((progressRing) => {
    const currentPercent = progressRing.getAttribute('data-percent');
    const radius = 32;
    const circumference = 2 * Math.PI * radius;

    progressRing.style.strokeDasharray = `${circumference} ${circumference}`;
    progressRing.style.strokeDashoffset =
        circumference - (currentPercent / 100) * circumference;
});

const searchButton = () => {
    searchModal.classList.remove('hidden');
};

const closeModal = () => {
    searchModal.classList.add('hidden');
};

function startCountdown(totalSeconds) {
    const countdownElement = document.getElementById('countdown');
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');

    const countdownInterval = setInterval(function () {
        if (totalSeconds <= 0) {
            clearInterval(countdownInterval);
            countdownElement.textContent = 'Waktu Habis';
        } else {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            hoursElement.textContent = String(hours).padStart(2, '0');
            minutesElement.textContent = String(minutes).padStart(2, '0');
            secondsElement.textContent = String(seconds).padStart(2, '0');

            totalSeconds--;

            // Simpan sisa waktu ke localStorage
            localStorage.setItem('remainingTime', totalSeconds);
        }
    }, 1000);
}

// Fungsi untuk mengambil waktu dari database (contoh)
function getTimeFromDatabase() {
    // Cek jika ada sisa waktu yang disimpan di localStorage
    const savedTime = localStorage.getItem('remainingTime');

    if (savedTime) {
        const remainingTime = parseInt(savedTime);
        startCountdown(remainingTime);
    } else {
        // Di sini Anda harus mengganti bagian ini dengan kode untuk mengambil waktu dari database.
        // Misalnya, Anda dapat menggunakan fetch API untuk mengambil waktu dari endpoint yang sesuai.
        // Di sini, saya hanya menggambarkan cara menampilkan waktu yang diterima dari database.
        const databaseTime = 3600; // Waktu dalam detik dari database (contoh: 1 jam)
        document.getElementById(
            'databaseTime'
        ).textContent = `Waktu dari Database: ${databaseTime / 60} menit`;

        // Memulai timer mundur dengan waktu dari database
        startCountdown(databaseTime);
    }
}

// Panggil fungsi untuk mengambil waktu dari database
getTimeFromDatabase();
