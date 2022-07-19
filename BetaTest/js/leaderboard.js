const users_list = document.querySelectorAll('.user');
const level_list = document.querySelectorAll('.level');
const points_list = document.querySelectorAll('.point');

var leaderboard_content = []

//create dicts
users_list.forEach((iteration_user, index) => {
    var iteration_level = level_list[index].innerText;
    var iteration_points = points_list[index].innerText;

    leaderboard_content.push({
        user: iteration_user,
        level: iteration_level,
        points: iteration_points,
        element: [users_list[index], level_list[index], points_list[index]],
    });
});

// sorting function
leaderboard_content.sort((a, b) => {
    return b.level - a.level;
});

//remove all objects
users_list.forEach(element => {
    element.parentNode.removeChild(element);
});
level_list.forEach(element => {
    element.parentNode.removeChild(element);
});
points_list.forEach(element => {
    element.parentNode.removeChild(element);
});

//Adding elements back
let i = 1;
leaderboard_content.forEach(content => {

    //create elements
    content_user = document.createElement('div');
    content_level = document.createElement('div');
    content_points = document.createElement('div');
    content_rank = document.createElement('div');

    //add text
    content_user.innerText = `${content.user.innerText}`;
    content_level.innerText = `${content.level}`;
    content_points.innerText = `${content.points}`;
    content_rank.innerText = `${i}`;
    i += 1;

    //add identifiers
    content_user.classList.add('user');
    content_level.classList.add('level');
    content_points.classList.add('point');
    content_rank.classList.add('ranks');

    //append to respective parents
    parent_user = document.getElementById('username');
    parent_user.appendChild(content_user)

    parent_level = document.getElementById('levels');
    parent_level.appendChild(content_level)

    parent_points = document.getElementById('points');
    parent_points.appendChild(content_points)

    parent_rank = document.getElementById('rank');
    parent_rank.appendChild(content_rank)
});

//search feature
const search_input = document.querySelector('[data-search]');

const search_user = document.querySelectorAll('.user');
const search_level = document.querySelectorAll('.level');
const search_points = document.querySelectorAll('.point');
const search_rank = document.querySelectorAll('.ranks');

leaderboard_search = []

search_user.forEach((iteration_index, index) => {
    leaderboard_search.push({
        user: search_user[index],
        level: search_level[index],
        points: search_points[index],
        rank: search_rank[index],
        element: [search_rank[index], search_user[index], search_level[index], search_points[index]],
    })
});

search_input.addEventListener('input', (e) => {
    const value = e.target.value.toString().toLowerCase();
    leaderboard_search.forEach(users => {
        const isVisible = users.user.innerText.toString().toLowerCase().includes(value) || 
        users.rank.innerText.toString().toLowerCase().includes(value) ||
        users.level.innerText.toString().toLowerCase().includes(value) ||
        users.points.innerText.toString().toLowerCase().includes(value);
        users.element.forEach((e) => {
            e.classList.toggle("hide", !isVisible);
        })
    })
});