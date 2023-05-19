// 获取导航菜单中的所有链接元素
const navLinks = document.querySelectorAll('nav a');

// 为每个链接添加点击事件
navLinks.forEach(link => {
  link.addEventListener('click', event => {
    event.preventDefault(); // 阻止默认链接行为

    const targetId = link.getAttribute('href'); // 获取目标元素的id
    const targetElement = document.querySelector(targetId); // 获取目标元素

    // 使用scrollIntoView方法平滑滚动到目标元素
    targetElement.scrollIntoView({ behavior: 'smooth' });
  });
});
