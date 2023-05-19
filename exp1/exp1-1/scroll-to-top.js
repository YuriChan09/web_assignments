// 创建一个按钮元素
const scrollToTopButton = document.createElement('button');
scrollToTopButton.innerText = '回到顶部';
scrollToTopButton.classList.add('scroll-to-top');

// 添加按钮元素到页面底部
document.body.appendChild(scrollToTopButton);

// 添加按钮点击事件
scrollToTopButton.addEventListener('click', () => {
  // 使用scrollTo方法平滑滚动回到页面顶部
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

// 监听窗口滚动事件，控制按钮的显示和隐藏
window.addEventListener('scroll', () => {
  const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollPosition > 300) {
    scrollToTopButton.classList.add('scroll-to-top--show');
  } else {
    scrollToTopButton.classList.remove('scroll-to-top--show');
  }
});
