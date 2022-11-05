import java.awt.*;

public  class Rectangle extends Shape implements Moveable {
    private int width;
    private int height;

    public int getWidth() {
        return width;
    }

    public void setWidth(int width) {
        this.width = width;
    }

    public int getHeight() {
        return height;
    }

    public void setHeight(int height) {
        this.height = height;
    }

    BoundingBox boundingBox;
    public Rectangle(Color color, boolean filled, int xCenter, int yCenter, int width, int height) {
        super( color, filled, xCenter, yCenter );
        this.width = width;
        this.height = height;
        setupBoundingBox();
    }
    @Override
    public BoundingBox setupBoundingBox()
    {

        return  new BoundingBox( new Point (getxCenter() - (width/2) ,getyCenter() + (height/2)) , new Point( getxCenter() + (width/2) , getyCenter() - (height/2) )) ;
     }
    @Override
    public void drawShape(Graphics g, boolean displayShapeName, boolean displayBoundingBox ) {
        g.setColor(getColor());

        if(getFilled()){
            g.fillRect(getxCenter()-(width/2), getyCenter()-(height/2),width,height );

        }
        else{

            g.drawRect(getxCenter()-(width/2), getyCenter()-(height/2),width,height);
        }

        if(displayShapeName)
            drawName(g);

        if(displayBoundingBox)
            drawBoundingBox(g);
    }
    public void moveShape(int x, int y){
        setxCenter(getxCenter()+x);
        setyCenter(getyCenter()+y);
    }
    @Override
    public void moveTenUnits() {
        setxCenter(getxCenter()+10);
    }


    @Override
    public String toString() {
        return "Rectangle{" +
                "width=" + width +
                ", height=" + height +
                '}' ;
    }

}
