import React, { useEffect } from 'react';
import classes from './services.module.scss';

const ProjectSlider = ({projects}) => {
  useEffect(() => {
    if (window.Swiper) {
      new window.Swiper('.projectSwiper', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: true,
        pagination: {
          el: '.swiper-pagination',
        },
        navigation: {
          nextEl: '.servicePageProjects__nav .swiper-button-next',
          prevEl: '.servicePageProjects__nav .swiper-button-prev',
        },
        breakpoints: {
          600: {
            slidesPerView: 2,
            spaceBetween: 28,
          },
        }
      });
    }
  }, []);

  return (
    <div className={`swiper projectSwiper`}>
      <div className={`swiper-wrapper`}>
        {projects.map((project, i) => (
        <div className={`swiper-slide ${classes.servicePageProjects__slider_slide}`}>
          <div>
            <h3>{project.title}</h3>
            <p>{project.text}</p>
          </div>
          <img src={project.img}/>
        </div>
        ))}
      </div>
    </div>
  );
};

export default ProjectSlider