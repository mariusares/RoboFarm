import java.awt.*;


public class Square extends Shape {
        private int width;
    private int height;


    public Square(Color color, boolean filled, int xCenter, int yCenter, int width, int height) {
        super( color, filled, xCenter, yCenter );
        this.width = width;
        this.height = height;


    }
    @Override
    public BoundingBox setupBoundingBox()
    {
        //return boundingBox =  new BoundingBox(new Point(xCenter - (width/2)), (yCenter-(width/2)), new Point((xCenter-(width/2)), (yCenter-(width/2)) ) );
        return  new BoundingBox( new Point (getxCenter() - (width/2) ,getyCenter() + (height/2)) , new Point( getxCenter() + (width/2) , getyCenter() - (height/2) )) ;
    }
    @Override
    public void drawShape(Graphics g, boolean displayShapeName, boolean displayBoundingBox ) {
        g.setColor(getColor());

        if(getFilled()){
            g.fillRect(getxCenter()-(width/2), getyCenter()-(height/2),width,height );
          //  g.fillRect(xCenter, yCenter, width, height );
          //  System.out.println(this.toString());
        }
        else{

            g.drawRect(getxCenter()-(width/2), getyCenter()-(height/2),width,height);

        }

        if(displayShapeName)
            drawName(g);

        if(displayBoundingBox)
            drawBoundingBox(g);
    }

    @Override
    public String toString() {
        return "Square{" +
                "width=" + width +
                ", height=" + height +
                '}';
    }

}