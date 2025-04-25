import React, { useRef, useState, useEffect } from 'react';
import classes from './services.module.scss';

const ShowMore = ({
  children,
  maxHeight = 200,
  duration = 1,
  allResolutions = false,
  btnText = 'Развернуть',
}) => {
  const contentRef = useRef(null);
  const [expanded, setExpanded] = useState(false);
  const [showButton, setShowButton] = useState(false);
  const [height, setHeight] = useState(maxHeight);

  useEffect(() => {
    const content = contentRef.current;
    if (!content) return;

    if (!allResolutions && window.matchMedia('(min-width: 1200px)').matches) {
      setShowButton(false);
      setExpanded(true);
      setHeight('auto');
      return;
    }

    if (content.scrollHeight <= maxHeight) {
      setShowButton(false);
      setExpanded(true);
      setHeight('auto');
      return;
    }

    setShowButton(true);
    setExpanded(false);
    setHeight(maxHeight);
  }, [maxHeight, allResolutions, children]);

  const handleShowMore = () => {
    const content = contentRef.current;
    setHeight(content.scrollHeight);
    setExpanded(true);
    setTimeout(() => setHeight('auto'), duration * 1000);
    setShowButton(false);
  };

  return (
    <div className={classes.servicePageSeo__showMore}>
      <div
        ref={contentRef}
        className={classes.servicePageSeo__showMore_content}
        style={{
          overflow: 'hidden',
          height: expanded ? height : maxHeight,
          transition: `height ${duration}s`,
        }}
      >
        {children}
      </div>
      {showButton && (
          <button onClick={handleShowMore}>
            {btnText}
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 7.67969L10 12.6797L5 7.67969" stroke="#76CCF8" stroke-width="1.5"/>
            </svg>
          </button>
      )}
    </div>
  );
};

export default ShowMore;