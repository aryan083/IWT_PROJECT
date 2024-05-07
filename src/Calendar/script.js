// JavaScript for Calendar
let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();
const day = document.querySelector(".calendar-dates");
const currdate = document.querySelector(".calendar-current-date");
const prenexIcons = document.querySelectorAll(".calendar-navigation span");
const newsPane = document.querySelector('.news-pane');
const eventContainer = document.querySelector('.event-container');

// Dummy news data associated with dates
const dummyNewsData = {
    "2024-05-01": "News for May 1st, 2024 Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "2024-05-02": "News for May 2nd, 2024 Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    "2024-05-03": "News for May 3rd, 2024 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
    // Add more dummy news data for other dates as needed
};

// Dummy event data associated with dates
const dummyEventData = {
    "2024-05-01": [
        { time: "10:00 AM", description: "Meeting with Client" },
        { time: "02:00 PM", description: "Team Lunch" }
    ],
    "2024-05-02": [
        { time: "11:00 AM", description: "Project Deadline" }
    ],
    
};

// Function to generate the calendar and display news for selected date
const manipulate = () => {
    let dayone = new Date(year, month, 1).getDay();
    let lastdate = new Date(year, month + 1, 0).getDate();
    let dayend = new Date(year, month, lastdate).getDay();
    let monthlastdate = new Date(year, month, 0).getDate();
    let lit = "";

    for (let i = dayone; i > 0; i--) {
        lit += `<li class="inactive">${monthlastdate - i + 1}</li>`;
    }

    for (let i = 1; i <= lastdate; i++) {
        if (i === date.getDate() && year === date.getFullYear() && month === date.getMonth()) {
            lit += `<li class="active">${i}</li>`;
        } else {
            lit += `<li>${i}</li>`;
        }
    }

    for (let i = 1; i < 7 - dayend; i++) {
        lit += `<li class="inactive">${i}</li>`;
    }

    day.innerHTML = lit;
    currdate.innerHTML = months[month] + " " + year;

    // Add event listeners for the calendar dates
    document.querySelectorAll('.calendar-dates li').forEach(dateElement => {
        dateElement.addEventListener('click', function () {
            const selectedDay = parseInt(this.textContent);
            const selectedDate = new Date(year, month, selectedDay);

            // Display news and events for the selected date
            displayNewsForDate(selectedDate);
            displayEventsForDate(selectedDate);

            // Highlight the selected date
            document.querySelectorAll('.calendar-dates li').forEach(element => {
                element.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
};

const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

const displayNewsForDate = (selectedDate) => {
    const dateString = selectedDate.toISOString().split('T')[0];
    if (dummyNewsData[dateString]) {
        newsPane.innerHTML = `<p>${dummyNewsData[dateString]}</p>`;
    } else {
        newsPane.innerHTML = `<p>No news available for ${selectedDate.toDateString()}</p>`;
    }
};

const displayEventsForDate = (selectedDate) => {
    const dateString = selectedDate.toISOString().split('T')[0];
    if (dummyEventData[dateString]) {
        const events = dummyEventData[dateString].map(event => `<p><strong>${event.time}</strong>: ${event.description}</p>`).join('');
        eventContainer.innerHTML = events;
    } else {
        eventContainer.innerHTML = `<p>No events available for ${selectedDate.toDateString()}</p>`;
    }
};

// Initial setup
manipulate();

// Event listeners for navigation buttons
prenexIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        if (icon.id === "calendar-prev") {
            month--;
            if (month < 0) {
                month = 11;
                year--;
            }
        } else {
            month++;
            if (month > 11) {
                month = 0;
                year++;
            }
        }
        manipulate();
    });
});